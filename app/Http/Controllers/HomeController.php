<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the user's dashboard.
     */
    public function showDashboard(Request $request): View
    {
        $aboutusContent = $this->about_webasesolution();
        return view('dashboard', [
            'aboutusContent' => $aboutusContent,
        ]);
    }
    /**
     * About Webase Solution.
     */
    public function about_webasesolution() {
        // Specify the URL to scrape
        $url = "https://webase.com.bd/about-us";
    
        // Create a Goutte client
        $client = new Client(HttpClient::create(['timeout' => 60]));
    
        try {
            // Fetch the web page content
            $crawler = $client->request('GET', $url);
    
            // Use filterXPath to select and keep specific elements
            $crawler->filterXPath('//div[contains(@class, "webase-nav")]')->each(function ($node) {
                $node->html(''); // Clear the HTML of the selected element
            });
    
            $crawler->filterXPath('//div[contains(@class, "page-title-area")]')->each(function ($node) {
                $node->html('');
            });
    
            $crawler->filterXPath('//section[contains(@class, "footer-section")]')->each(function ($node) {
                $node->html('');
            });
    
            // Get the remaining HTML content as a string
            $modifiedHtml = $crawler->html();
    
            // Return the modified HTML as a response
            return $modifiedHtml;
        } catch (\Exception $e) {
            // Handle any errors, such as invalid URLs or failed requests
            return response()->json(['error' => 'Failed to fetch or modify content']);
        }
    }
}
