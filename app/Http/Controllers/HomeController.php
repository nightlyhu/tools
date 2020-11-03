<?php

namespace App\Http\Controllers;

use App\Services\AgentService;
use Illuminate\View\View;

class HomeController extends Controller {

    private AgentService $agentService;

    public function __construct(AgentService $agentService) {
        $this->agentService = $agentService;
    }

    public function home(): View {
        $ip = $this->agentService->getIp();
        $host = $ip ? gethostbyaddr($ip) : '-';

        return view('pages.home', [
            'title' => 'Developer Tools :: Nightly.hu',
            'yourIP' => $ip,
            'yourHost' => $host,
            'browser' => $this->agentService->getBrowser(),
            'yourOS' => $this->agentService->getOS()
        ]);
    }

    public function generators(): View {
        return view('pages.generators', [
            'title' => 'Generators - Developer Tools :: Nightly.hu'
        ]);
    }

    public function network(): View {
        return view('pages.network', [
            'title' => 'Network - Developer Tools :: Nightly.hu'
        ]);
    }

    public function about(): View {
        return view('pages.about', [
            'title' => 'About - Developer Tools :: Nightly.hu'
        ]);
    }

    public function links(): View {
        return view('pages.links', [
            'title' => 'Links - Developer Tools :: Nightly.hu'
        ]);
    }

    public function colorPicker(string $color = "008080"): View {
        return view('pages.color-picker', [
            'title' => 'Color Picker - Developer Tools :: Nightly.hu',
            'color' => $color
        ]);
    }
}
