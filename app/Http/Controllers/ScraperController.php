<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use App\Models\Article;

class ScraperController extends Controller
{
    private $results = array();

    public function scraper() {

        $client = new Client();
        $url =
        'https://www.businessinsider.com/great-salary-convergence-remote-work-professional-pay-tech-silicon-valley-2022-8?utm_medium=ingest&utm_source=bloomberg';

        $page = $client->request('GET', $url);

        // Get the body of the article, deliberately excludes the inline links and graphs...for now
        $results = $page
            ->filterXpath('//*[@id="piano-inline-content-wrapper"]/div/div')
            ->children()
            ->each(function ($node, $i) {
                if ($node->nodeName() !== 'div') {
                    return [$node->nodeName(), $node->text()]; // Returns empty values in the array where the divs would have been
                }
            });

        // Remove the empty values from the array
        $body = array_filter($results);

        // Get the title
        $title = $page
            ->filterXpath('//*[@id="l-main-content"]/section[1]/h1')
            ->text();


        // Store scraped values for later
        // Article::create([
        //     'title' => $title,
        //     'body'  => json_encode($body)
        // ]);

        return view('scraper', compact('title', 'body'));
    }
}
