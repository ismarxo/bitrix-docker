#!/usr/bin/php
<?php
$doc_root = getcwd();
$mail_path = str_replace('public_html', 'mail', $doc_root).'/';

$input = file_get_contents('php://stdin');
preg_match('|^To: (.*)|', $input, $matches);
$t = $mail_path . $matches[1] . '_' . time() . '.eml';
chmod($t, 0644);
file_put_contents($t, $input);