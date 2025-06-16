<?php

// vendor/contao/core-bundle/contao/languages/ja/tl_form.xlf
$GLOBALS['TL_LANG']['tl_form']['title']['0'] = '題名';
$GLOBALS['TL_LANG']['tl_form']['title']['1'] = 'フォームの名前を入力してください。';
$GLOBALS['TL_LANG']['tl_form']['alias']['0'] = 'フォームのエイリアス';
$GLOBALS['TL_LANG']['tl_form']['alias']['1'] = 'フォームのエイリアスは、その数値のIDの代わりにフォームを参照できる、重複しない名前です。';
$GLOBALS['TL_LANG']['tl_form']['jumpTo']['0'] = 'リダイレクト先のページ';
$GLOBALS['TL_LANG']['tl_form']['jumpTo']['1'] = 'フォームを提出した後に移動するページを選択してください。';
$GLOBALS['TL_LANG']['tl_form']['confirmation']['0'] = '確認のメッセージ';
$GLOBALS['TL_LANG']['tl_form']['confirmation']['1'] = 'フォームを提出した後に表示するメッセージを入力できます。シンプルトークン、<code>##field_name##</code>といったシンプルトークンとして提出したフォームのデータを使用できます。確認のメッセージは<code>{{form_confirmation}}</code>という挿入タグでも利用できます。';
$GLOBALS['TL_LANG']['tl_form']['sendViaEmail']['0'] = 'フォームのデータを電子メールで送信';
$GLOBALS['TL_LANG']['tl_form']['sendViaEmail']['1'] = '提出されたデータを電子メールのアドレス宛に送信します。';
$GLOBALS['TL_LANG']['tl_form']['mailerTransport']['0'] = 'メールトランスポート';
$GLOBALS['TL_LANG']['tl_form']['mailerTransport']['1'] = 'フォームを電子メールで送信するのに使用するメールトランスポートを上書きできます。';
$GLOBALS['TL_LANG']['tl_form']['recipient']['0'] = '宛先のアドレス';
$GLOBALS['TL_LANG']['tl_form']['recipient']['1'] = '複数の電子メールアドレスはコンマで区切ってください。';
$GLOBALS['TL_LANG']['tl_form']['subject']['0'] = '件名';
$GLOBALS['TL_LANG']['tl_form']['subject']['1'] = '電子メールの件名を入力してください。';
$GLOBALS['TL_LANG']['tl_form']['format']['0'] = 'データの形式';
$GLOBALS['TL_LANG']['tl_form']['format']['1'] = 'フォームのデータを転送するか形式を設定します。';
$GLOBALS['TL_LANG']['tl_form']['raw']['0'] = '生のデータ';
$GLOBALS['TL_LANG']['tl_form']['raw']['1'] = 'フォームのデータを1行に1項目としたテキスト形式のメッセージで送信します。';
$GLOBALS['TL_LANG']['tl_form']['xml']['0'] = 'XMLファイル';
$GLOBALS['TL_LANG']['tl_form']['xml']['1'] = 'フォームのデータをXMLファイルにして電子メールに添付します。';
$GLOBALS['TL_LANG']['tl_form']['csv']['0'] = 'CSVファイル';
$GLOBALS['TL_LANG']['tl_form']['csv']['1'] = 'フォームのデータをCSVファイルにして電子メールに添付します。';
$GLOBALS['TL_LANG']['tl_form']['csv_excel']['0'] = 'CSVファイル(マイクロソフトExcel)';
$GLOBALS['TL_LANG']['tl_form']['csv_excel']['1'] = 'フォームのデータをマイクロソフトExcelで読み込めるCSVファイルにして電子メールに添付します。';
$GLOBALS['TL_LANG']['tl_form']['skipEmpty']['0'] = '空の入力項目を省略';
$GLOBALS['TL_LANG']['tl_form']['skipEmpty']['1'] = '空の項目をフォームのデータに含めません。';
$GLOBALS['TL_LANG']['tl_form']['email']['0'] = '電子メール';
$GLOBALS['TL_LANG']['tl_form']['email']['1'] = '<em>name</em>、<em>email</em>、<em>subject</em>、<em>message</em>、<em>cc</em>(carbon copy)以外の項目の名前の入力項目を無視して、メールのクライアントから送信されたようにフォームのデータを送信します。ファイルのアップロードも可能です。';
$GLOBALS['TL_LANG']['tl_form']['skipEmtpy']['0'] = '空の入力項目を省略';
$GLOBALS['TL_LANG']['tl_form']['skipEmtpy']['1'] = '電子メールに空の入力項目を表示しません。';
$GLOBALS['TL_LANG']['tl_form']['storeValues']['0'] = 'データを保存';
$GLOBALS['TL_LANG']['tl_form']['storeValues']['1'] = '提出されたデータをデータベースに保存します。';
$GLOBALS['TL_LANG']['tl_form']['customTpl']['0'] = 'フォームのテンプレート';
$GLOBALS['TL_LANG']['tl_form']['customTpl']['1'] = 'フォームのテンプレートを選択します。';
$GLOBALS['TL_LANG']['tl_form']['targetTable']['0'] = '保存先のテーブル';
$GLOBALS['TL_LANG']['tl_form']['targetTable']['1'] = '保存先とするテーブルは、各入力項目に対応した列を含んでいなければなりません。';
$GLOBALS['TL_LANG']['tl_form']['method']['0'] = '提出のメソッド';
$GLOBALS['TL_LANG']['tl_form']['method']['1'] = 'フォームの提出のメソッドの初期設定はPOSTです。';
$GLOBALS['TL_LANG']['tl_form']['novalidate']['0'] = 'HTML5の検証を使用しない';
$GLOBALS['TL_LANG']['tl_form']['novalidate']['1'] = 'フォームのタグの属性に<em>novalidate</em>を追加します。';
$GLOBALS['TL_LANG']['tl_form']['attributes']['0'] = 'CSSのIDとclass';
$GLOBALS['TL_LANG']['tl_form']['attributes']['1'] = 'IDと1つ以上のclassを設定できます。';
$GLOBALS['TL_LANG']['tl_form']['formID']['0'] = 'フォームのID';
$GLOBALS['TL_LANG']['tl_form']['formID']['1'] = 'Contaoのモジュールの動作を開始させるのにフォームのIDが必要です。';
$GLOBALS['TL_LANG']['tl_form']['allowTags']['0'] = 'HTMLタグの許可';
$GLOBALS['TL_LANG']['tl_form']['allowTags']['1'] = 'HTMLタグをフォームの入力項目に許可します。';
$GLOBALS['TL_LANG']['tl_form']['ajax']['0'] = 'Ajaxで提出';
$GLOBALS['TL_LANG']['tl_form']['ajax']['1'] = 'ページを再読み込みする代わりにAjaxでフォームを提出します。';
$GLOBALS['TL_LANG']['tl_form']['tstamp']['0'] = '改訂日';
$GLOBALS['TL_LANG']['tl_form']['tstamp']['1'] = '最新のリビジョンの日付と時刻';
$GLOBALS['TL_LANG']['tl_form']['title_legend'] = '題名とリダイレクト先のページ';
$GLOBALS['TL_LANG']['tl_form']['email_legend'] = 'フォームのデータの送信';
$GLOBALS['TL_LANG']['tl_form']['store_legend'] = 'フォームのデータの保存';
$GLOBALS['TL_LANG']['tl_form']['expert_legend'] = '専門的な設定';
$GLOBALS['TL_LANG']['tl_form']['config_legend'] = 'フォームの構成';
$GLOBALS['TL_LANG']['tl_form']['confirm_legend'] = '確認';
$GLOBALS['TL_LANG']['tl_form']['template_legend'] = 'テンプレートの設定';
$GLOBALS['TL_LANG']['tl_form']['new']['0'] = '新規作成';
$GLOBALS['TL_LANG']['tl_form']['new']['1'] = '新しいフォームを作成';
$GLOBALS['TL_LANG']['tl_form']['show'] = 'ID %sのフォームの詳細を表示';
$GLOBALS['TL_LANG']['tl_form']['edit'] = 'ID %sのフォームを編集';
$GLOBALS['TL_LANG']['tl_form']['children'] = 'ID %sのフォームのフォーム項目を編集';
$GLOBALS['TL_LANG']['tl_form']['copy'] = 'ID %sのフォームを複製';
$GLOBALS['TL_LANG']['tl_form']['delete'] = 'ID %sのフォームを削除';
$GLOBALS['TL_LANG']['tl_form']['targetTableMissingAllowlist'] = '以下のDCAの構成で利用できるテーブルを定義してください: <code>%s</code>';

/*
 * Legends
 */
$GLOBALS['TL_LANG']['tl_form']['mp_forms_legend'] = '複数ページのフォーム';
/*
 * Fields
 */
$GLOBALS['TL_LANG']['tl_form']['mp_forms_getParam'] = ['段階の問い合わせのパラメーター', 'ここで段階に使用する問い合わせパラメーターを変更できます。'];
$GLOBALS['TL_LANG']['tl_form']['mp_forms_sessionRefParam'] = ['セッション参照の問い合わせのパラメータ', '複数のタブで同時の編集を有効にするには参照が必要です。この設定で問い合わせのパラメーターの名前を調整してください。'];
$GLOBALS['TL_LANG']['tl_form']['mp_forms_backFragment'] = ['戻るボタンのURLの断片', '戻るボタンをクリックしたときのURLに付加するURLの断片(例えば、アンカーのリンク)を入力できます。"#"とすると省略できます。'];
$GLOBALS['TL_LANG']['tl_form']['mp_forms_nextFragment'] = ['続けるボタンのURLの断片', '続けるボタンをクリックしたときのURLに付加するURLの断片(例えば、アンカーのリンク)を入力できます。"#"とすると省略できます。'];
