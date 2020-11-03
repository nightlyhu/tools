<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DnsController extends Controller {

    /**
     * DNS tool.
     * GET /dns
     *
     * @param string|null $domain
     * @return View
     */
    public function index(?string $domain = null): View {
        if (!is_null($domain)) {
            dd(collect(dns_get_record($domain, DNS_ALL)));
        }

    }

}
