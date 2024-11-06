<?php

function requestIndexingWithBackoff($url, $maxRetries = 5)
        {
            $client = new Client();
            $client->setAuthConfig(public_path('assets/ezead-433712-5f6668c6cb59.json'));
            $client->addScope('https://www.googleapis.com/auth/indexing');
        
            $service = new Indexing($client);
            $retryCount = 0;
            $success = false;
        
            // Create a UrlNotification instance
            $urlNotification = new UrlNotification();
            $urlNotification->setUrl($url);
            $urlNotification->setType('URL_UPDATED'); // Use 'URL_UPDATED' for new or updated URLs, or 'URL_DELETED' for deletions

            while ($retryCount < $maxRetries && !$success) {
                try {
                    // Send the indexing request
                    $response = $service->urlNotifications->publish($urlNotification);
                    // dd($response); 
                    $success = true;
                    // echo "Request to index URL submitted successfully.";
                } catch (\Google\Service\Exception $e) {
                    if ($e->getCode() === 429) { // HTTP 429 Too Many Requests
                        $retryCount++;
                        $backoff = pow(2, $retryCount); // Exponential backoff
                        sleep($backoff);
                    } else {
                        throw $e;
                    }
                }
            }
        
            if (!$success) {
                echo "Failed to submit URL for indexing after {$maxRetries} retries.";
            }
        }

        function storePost(Request $request){
            //After save post get url and call function to submit url
            $post->save();
		
            $url = url("/{$post->slug}/{$post->id}");
            
            $this->requestIndexingWithBackoff($url);
        }
        ?>