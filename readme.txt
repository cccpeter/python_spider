In this paper, a crawler based on depth first algorithm is implemented through Python. This paper introduces the design and implementation process of web crawler search engine, and how to run on the server, how to implement search interface and data storage web page parsing.
By implementing the crawler program, we start to crawl the initial web page through a given initial URL, then analyze the URL contained in the initial web page to join our crawler crawl queue. We take the crawled web page URL to do MD5 processing and return the 32 character hash value into a list for the next crawl to do URL reprocessing.
Finally, we will crawl some of the web pages on the Internet to store the results of the Elasticsearch for our next user.
Key words: web crawler, depth first, regular expression, MD5, Python, search engine, Elasticsearch


