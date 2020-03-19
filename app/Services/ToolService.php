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
        if ($multiple) {
            $strings = explode('<br />', nl2br($text));
        } else {
            $strings = [$text];
        }

        $results = "";

        foreach ($strings as $string) {
            $result = "";

            switch ($action) {
                case 'uppercase':
                    $result = Str::upper($string);
                    break;
                case 'lowercase':
                    $result = Str::lower($string);
                    break;
                case 'title-case':
                    $result = Str::title($string);
                    break;
                case 'slugify':
                    $result = Str::slug($string);
                    break;
            }


            $results .= $result . '<br>';
        }

        return $results;
    }

    /**
     * Generate hash from text by given algorithm.
     *
     * @param string $algorithm
     * @param string $text
     * @return false|string|null
     */
    public function hash(string $algorithm, string $text): string {
        $hash = '';
        switch ($algorithm) {
            case 'md5':
                $hash = md5($text);
                break;
            case 'sha1':
                $hash = sha1($text);
                break;
            case 'bcrypt':
                $hash = password_hash($text, PASSWORD_BCRYPT);
                break;
        }

        return $hash;
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
        $chars = '';

        switch ($strength) {
            case 'numbers':
                $chars = $numbers;
                break;
            case 'letters':
                $chars = $letters . mb_strtoupper($letters);
                break;
            case 'lowercase-letters':
                $chars = $letters;
                break;
            case 'uppercase-letters':
                $chars = mb_strtoupper($letters);
                break;
            case 'alphanumeric':
                $chars = $letters . mb_strtoupper($letters) . $numbers;
                break;
            case 'symbols':
                $chars = $letters . mb_strtoupper($letters) . $numbers . $symbols;
                break;
            case 'strong-symbols':
                $chars = $letters . mb_strtoupper($letters) . $numbers . $symbols . $strongSymbols;
                break;
        }

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
        $result = '';
        switch ($method) {
            case 'base64':
                $result = $action == 'encode' ? base64_encode($text) : base64_decode($text);
                break;
            case 'url':
                $result = $action == 'encode' ? urlencode($text) : urldecode($text);
                break;
        }

        return $result;
    }

}
