<?php

namespace App\Services;

use stdClass;

class AgentService extends Service {

    /**
     * @return mixed
     */
    public function getIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

    /**
     * @return stdClass
     */
    public function getBrowser() {
        $browser = new stdClass();
        $browser->useragent = $_SERVER['HTTP_USER_AGENT'];

        if (preg_match('/MSIE/i', $browser->useragent) && !preg_match('/Opera/i', $browser->useragent)) {
            $browser->app = "internet-explorer";
            $browser->name = "Internet Explorer";
            $browser->codename = "MSIE";
        } elseif (preg_match('/Firefox/i', $browser->useragent)) {
            $browser->app = "firefox";
            $browser->name = "Mozilla Firefox";
            $browser->codename = "Firefox";
        } elseif (preg_match('/OPRGX/i', $browser->useragent)) {
            $browser->app = "opera";
            $browser->name = "Opera GX";
            $browser->codename = "OPRGX";
        } elseif (preg_match('/OPR/i', $browser->useragent)) {
            $browser->app = "opera";
            $browser->name = "Opera";
            $browser->codename = "OPR";
        } elseif (preg_match('/Chrome/i', $browser->useragent) && !preg_match('/Edge/i', $browser->useragent)) {
            $browser->app = "chrome";
            $browser->name = "Google Chrome";
            $browser->codename = "Chrome";
        } elseif (preg_match('/Safari/i', $browser->useragent) && !preg_match('/Edge/i', $browser->useragent)) {
            $browser->app = "safari";
            $browser->name = "Apple Safari";
            $browser->codename = "Safari";
        } elseif (preg_match('/Edg/i', $browser->useragent)) {
            $browser->app = "edge";
            $browser->name = "MS Edge (Chromium)";
            $browser->codename = "Edg";
        } elseif (preg_match('/Edge/i', $browser->useragent)) {
            $browser->app = "edge";
            $browser->name = "MS Edge";
            $browser->codename = "Edge";
        } elseif (preg_match('/Trident/i', $browser->useragent)) {
            $browser->app = "internet-explorer";
            $browser->name = "Internet Explorer";
            $browser->codename = "Trident";
        } else {
            $browser->app = "browser";
            $browser->name = "Unknown";
            $browser->codename = "";
        }

        $known = array('Version', $browser->codename, 'other');
        $pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        preg_match_all($pattern, $browser->useragent, $matches);

        $i = count($matches['browser']);
        if ($i != 1) {
            if (strripos($browser->useragent, "Version") < strripos($browser->useragent, $browser->name)) {
                $version = $matches['version'][0] ?? '';
            } else {
                $version = $matches['version'][1] ?? '';
            }
        } else {
            $version = $matches['version'][0] ?? '';
        }

        if ($version == null || $version == "") {
            $version = "";
        }

        $browser->version = $version;
        return $browser;
    }

    /**
     * @return mixed|string
     */
    public function getOS() {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $osPlatform = "Unknown OS Platform";

        $osRegexes = [
            '/windows nt 10/i' => 'Windows 10',
            '/windows nt 6.3/i' => 'Windows 8.1',
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i' => 'Windows XP',
            '/windows xp/i' => 'Windows XP',
            '/windows nt 5.0/i' => 'Windows 2000',
            '/windows me/i' => 'Windows ME',
            '/win98/i' => 'Windows 98',
            '/win95/i' => 'Windows 95',
            '/win16/i' => 'Windows 3.11',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/mac_powerpc/i' => 'Mac OS 9',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/webos/i' => 'Mobile'
        ];

        foreach ($osRegexes as $regex => $value) {
            if (preg_match($regex, $userAgent)) {
                $osPlatform = $value;
            }
        }

        return $osPlatform;
    }
}
