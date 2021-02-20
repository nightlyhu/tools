<?php

namespace App\Services;

use Illuminate\Support\Str;

class ToolService extends Service {

    /**
     * Text transform of text(s).
     *
     * @param string $action
     * @param bool $multiple
     * @param string $text
     * @return string
     */
    public function textTransform(string $action, bool $multiple, string $text): string {
        $strings = $multiple ? explode('<br />', nl2br($text)) : [$text];
        $results = "";

        foreach ($strings as $string) {
            $result = match ($action) {
                'uppercase' => Str::upper($string),
                'lowercase' => Str::lower($string),
                'title-case' => Str::title($string),
                'slugify' => Str::slug($string),
                default => ""
            };

            $results .= $result . '<br>';
        }

        return $results;
    }

    /**
     * Generate hash from text by given algorithm.
     *
     * @param string $algorithm
     * @param string $text
     * @return string
     */
    public function hash(string $algorithm, string $text): string {
        return match ($algorithm) {
            'md5' => md5($text),
            'sha1' => sha1($text),
            'bcrypt' => password_hash($text, PASSWORD_BCRYPT),
            default => ""
        };
    }

    /**
     * Generate password.
     *
     * @param int $length
     * @param string $strength
     * @return string
     */
    public function generatePassword(int $length, string $strength): string {
        $letters = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $symbols = '._-';
        $strongSymbols = '@#$%';

        $chars = match ($strength) {
            'numbers' => $numbers,
            'letters' => $letters . mb_strtoupper($letters),
            'lowercase-letters' => $letters,
            'uppercase-letters' => mb_strtoupper($letters),
            'alphanumeric' => $letters . mb_strtoupper($letters) . $numbers,
            'symbols' => $letters . mb_strtoupper($letters) . $numbers . $symbols,
            'strong-symbols' => $letters . mb_strtoupper($letters) . $numbers . $symbols . $strongSymbols,
            default => ""
        };

        $count = mb_strlen($chars);
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $password .= mb_substr($chars, $index, 1);
        }

        return $password;
    }

    /**
     * Encode or decode a string.
     *
     * @param string $method
     * @param string $action
     * @param string $text
     * @return string
     */
    public function encoding(string $method, string $action, string $text): string {
        return match ($method) {
            'base64' => $action == 'encode' ? base64_encode($text) : base64_decode($text),
            'url' => $action == 'encode' ? urlencode($text) : urldecode($text),
            default => ""
        };
    }

}
