# Submit-url-for-index-on-google
This Laravel script allows you to submit a URL directly to Google for indexing, prompting Google to crawl and index the URL faster. This can be useful for new content, updated pages, or important URLs that need to be indexed promptly.

**Features**
Automates URL submission to Google for indexing
Simplifies the process of requesting Google to crawl specific URLs
Helps speed up the indexing of new or updated content on your site

**Prerequisites**
Google API Credentials: This script requires API credentials for the Google Indexing API.
Google Search Console: Ensure your website is verified in Google Search Console.
Installation
Clone the Repository
Clone this repository to your Laravel project or add the files to your existing project.

**Install Required Packages**
Run the following command to install any required packages:

**composer require google/apiclient**

**Configure Google API**

Go to the Google Developer Console.
Enable the Indexing API.
Download the JSON credentials file and place it in your Laravel project.
Set up Environment Variables
Add the following variables to your .env file:

GOOGLE_API_CREDENTIALS_PATH=/path/to/your/google-credentials.json
