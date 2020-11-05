<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Throwable;

class DnsController extends Controller {

    /**
     * DNS tool.
     * GET /dns
     *
     * @param string|null $domain
     * @return View
     */
    public function index(?string $domain = null) {
        $records = collect();

        if (!is_null($domain)) {
            try {
                $records = collect(dns_get_record($domain, DNS_ALL))
                    ->sortBy("type")
                    ->mapToGroups(fn($record) => [$record["type"] => (object)$record]);
            } catch (Throwable $e) {
                $records = collect();
            }
        }

        return view('pages.dns', [
            'title' => 'DNS lookup - Developer Tools :: Nightly.hu',
            'domain' => $domain,
            'records' => $records
        ]);
    }

}
