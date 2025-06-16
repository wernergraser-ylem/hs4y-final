<?php

// vendor/contao/core-bundle/contao/languages/ja/exception.xlf
$GLOBALS['TL_LANG']['XPT']['error'] = 'エラーが発生しました';
$GLOBALS['TL_LANG']['XPT']['matter'] = 'どうしましたか?';
$GLOBALS['TL_LANG']['XPT']['howToFix'] = 'どうすれば問題を解決できますか?';
$GLOBALS['TL_LANG']['XPT']['more'] = 'さらに詳しく教えてください';
$GLOBALS['TL_LANG']['XPT']['hint'] = 'この通知をカスタマイズするには、<em>%s</em>を上書きする独自のTwigテンプレートを作成してください。';
$GLOBALS['TL_LANG']['XPT']['errorOccurred'] = 'このスクリプトの実行中にエラーが発生しました。何かが適切に動作していません。';
$GLOBALS['TL_LANG']['XPT']['errorFixOne'] = '<code>var/logs</code>というディレクトリにある現在のログファイルを開いて、対応する(通常は最後の)エラーメッセージを探してください。';
$GLOBALS['TL_LANG']['XPT']['errorExplain'] = '何かが適切に動作していないため、スクリプトの実行が停止しました。この通知による実際のエラーメッセージはセキュリティ上の理由で表示していませんが、現在のログファイルで確認できます(上記を参照)。エラーメッセージの意味を理解できない場合や修正の方法がわからない場合は<a href="%s" target="_blank" rel="noreferrer noopener">Contaoのサポートのページ</a>を参照してください。';
$GLOBALS['TL_LANG']['XPT']['requestToken'] = '不正なリクエストトークン';
$GLOBALS['TL_LANG']['XPT']['invalidToken'] = 'リクエストトークンを照合できませんでした。';
$GLOBALS['TL_LANG']['XPT']['tokenRetry'] = '<a href="javascript:window.location.href=window.location.href">ここをクリック</a>して、もう一度試してください。ブラウザーの戻るボタンは使用しないでください。';
$GLOBALS['TL_LANG']['XPT']['tokenExplainOne'] = 'このエラーは有効な認証トークンがないPOST要求で発生します。Contao 2.10からリファラーの照合をリクエストトークンのシステムに置き換えました。問題が継続する場合は互換性のない第三者の機能拡張を使用しているためか、インストールしているContaoを正しく更新していないためかもしれません。';
$GLOBALS['TL_LANG']['XPT']['tokenExplainTwo'] = 'さらに詳しい情報は、<a href="%s" target="_blank" rel="noreferrer noopener">Contaoのサポートのページ</a>を参照してください。';
$GLOBALS['TL_LANG']['XPT']['unavailable'] = 'サービスを利用できません';
$GLOBALS['TL_LANG']['XPT']['maintenance'] = '現在、このウェブサイトは利用できません。後ほどお出でください。';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['title'] = 'フロントエンドのURLを生成できません。';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['matter'] = 'URLを生成できませんでした、なぜならルートに必須のパラメーターが指定されていません。追加の情報(例えば、ニュースのエイリアス)を指定しなければなりません。';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['explain'] = 'Symfonyのルートは可変のパラメーターを使用可能で、それらを正規表現で検証します。以下の構成を解決できませんでした:';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['path'] = 'ルートのパス';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterName'] = '名前';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterRequirement'] = '必要条件(正規表現)';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterDefault'] = '初期設定';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterEmpty'] = '空';
