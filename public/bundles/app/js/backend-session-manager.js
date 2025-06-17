/**
 * Backend Session Manager für Contao 5.3
 * Warnt vor Session-Timeout und erneuert Session bei Aktivität
 */
(function() {
    'use strict';

    console.log('Backend Session Manager Script geladen!');

    // Konfiguration (kann später aus Backend geladen werden)
    const config = {
        sessionTimeout: 1800,     // 30 Minuten!
        warningTime: #300,         // 5 Minute Warnung
        checkInterval: 60,       // Alle 60 Sekunden prüfen
        debugMode: false          // Debug AUS!
    };

    let lastActivity = Date.now();
    let warningShown = false;
    let warningDialog = null;

    function log(message) {
        if (config.debugMode) {
            console.log('[SessionManager]', message);
        }
    }

    function updateActivity() {
        lastActivity = Date.now();
        warningShown = false;
        if (warningDialog) {
            warningDialog.close();
            warningDialog = null;
        }
        log('Activity updated');
    }

    function createWarningDialog() {
        const dialog = document.createElement('div');
        dialog.innerHTML = `
            <div style="
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: white;
                padding: 2rem;
                border-radius: 8px;
                box-shadow: 0 4px 20px rgba(0,0,0,0.3);
                z-index: 99999;
                max-width: 400px;
                text-align: center;
            ">
                <h3 style="margin: 0 0 1rem 0; color: #ff6b6b;">
                    ⚠️ Sitzung läuft ab!
                </h3>
                <p style="margin: 0 0 1.5rem 0;">
                    Deine Sitzung läuft in <strong><span id="countdown">5:00</span></strong> Minuten ab.
                    <br>Möchten Sie angemeldet bleiben?
                </p>
                <div style="display: flex; gap: 1rem; justify-content: center;">
                    <button id="stay-logged-in" style="
                        padding: 0.5rem 1.5rem;
                        background: #4CAF50;
                        color: white;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                    ">Angemeldet bleiben</button>
                    <button id="logout-now" style="
                        padding: 0.5rem 1.5rem;
                        background: #666;
                        color: white;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                    ">Jetzt abmelden</button>
                </div>
            </div>
            <div style="
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0,0,0,0.5);
                z-index: 99998;
            "></div>
        `;

        document.body.appendChild(dialog);

        // Event Handlers
        dialog.querySelector('#stay-logged-in').addEventListener('click', () => {
            renewSession();
            dialog.remove();
            warningDialog = null;
        });

        dialog.querySelector('#logout-now').addEventListener('click', () => {
            window.location.href = '/contao/login';
        });

        // Countdown updaten
        let remainingSeconds = config.warningTime;
        const countdownEl = dialog.querySelector('#countdown');

        const countdownInterval = setInterval(() => {
            remainingSeconds--;
            const minutes = Math.floor(remainingSeconds / 60);
            const seconds = remainingSeconds % 60;
            countdownEl.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;

            if (remainingSeconds <= 0) {
                clearInterval(countdownInterval);
                window.location.href = '/contao/login';
            }
        }, 1000);

        dialog.close = () => {
            clearInterval(countdownInterval);
            dialog.remove();
        };

        return dialog;
    }

    function renewSession() {
        log('Renewing session...');

        // Request-Token aus Meta-Tag holen
        const token = document.querySelector('meta[name="csrf-token"]')?.content ||
            document.querySelector('input[name="REQUEST_TOKEN"]')?.value;

        fetch('/contao/backend', {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-Token': token,
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'action=keepalive'
        })
            .then(response => {
                if (response.ok) {
                    log('Session renewed successfully');
                    updateActivity();
                } else {
                    log('Session renewal failed');
                    window.location.href = '/contao/login';
                }
            })
            .catch(error => {
                log('Session renewal error:', error);
            });
    }

    function checkSession() {
        const now = Date.now();
        const timeSinceActivity = (now - lastActivity) / 1000;
        const timeUntilTimeout = config.sessionTimeout - timeSinceActivity;

        log(`Time until timeout: ${Math.round(timeUntilTimeout)}s`);

        if (timeUntilTimeout <= config.warningTime && !warningShown) {
            warningShown = true;
            warningDialog = createWarningDialog();
        } else if (timeUntilTimeout <= 0) {
            window.location.href = '/contao/login';
        }
    }

    // Event Listener für Benutzeraktivität
    ['click', 'keypress', 'mousemove', 'touchstart'].forEach(event => {
        document.addEventListener(event, updateActivity, { passive: true });
    });

    // Session-Check starten
    setInterval(checkSession, config.checkInterval * 1000);

    // Initial
    updateActivity();
    log('Session Manager initialized');

})();