# -*- coding: utf-8 -*-
import scrapy
import re
from scrapy.http import Request
from urllib import parse
from ArticleSpider.items import ArticleItem,ArticleItemLoader
class JobboleSpider(scrapy.Spider):
    name = 'jobbole'
    allowed_domains = ['http://blog.jobbole.com/']
    start_urls = ['http://blog.jobbole.com/all-posts/page/1']

    def parse(self, response):
        maxpage=self.getmaxpage(response)
        for page in range(1,int(maxpage)):
            # print(page)
            i=page
            # self.getpageurl(response)
            url = parse.urljoin("http://blog.jobbole.com/all-posts/page/1", str(i))
            # print(url)
            yield scrapy.Request(url,callback=self.pageurl,dont_filter=True)
            # yield Request(url=parse.urljoin("http://blog.jobbole.com/all-posts/page/1.html", str(i)+".html"),callback=self.getpageurl)
    def parse_detail(self,response):
        # 获取每一个文章的所有内容//*[@id="post-113659"]/div[1]/h1
        article_item = ArticleItem()
        str1=response.url
        pattern = re.compile(r'>.*?(\d+).*<')
        res = re.findall(pattern, str1)
        url=str1
        title=response.xpath("//div[@class='entry-header']/h1/text()").extract()[0]
        time=response.xpath("//p[@class='entry-meta-hide-on-mobile']/text()").extract()[0].strip().replace("·","")
        redianzang=response.css(".register-user-only h10::text").extract_first()
        if redianzang==None:
            redianzang=0
        redianzang=('%s%s'%(redianzang,'点赞'))
        shoucang=response.xpath("//span[contains(@class, 'bookmark-btn')]/text()").extract()[0]
        pinglun=response.xpath("//a[@href='#article-comment']/span/text()").extract()[0]
        context=response.xpath("//div[@class='entry']").extract()[0]
        item_loader = ArticleItemLoader(item=ArticleItem(), response=response)
        item_loader.add_value('title',title)
        item_loader.add_value('times',time)
        item_loader.add_value('redianzang',redianzang)
        item_loader.add_value('shoucang',shoucang)
        item_loader.add_value('pinglun',pinglun)
        item_loader.add_value('context',context)
        item_loader.add_value('url',response.url)
        article_item = item_loader.load_item()

        yield article_item
    def getmaxpage(self,response):
        # 最大页数
        nexturl = response.css(".navigation a::attr(href)")
        maxpage=re.match(".*(..[0-9]).*", nexturl[2].extract()).group(1)
        return maxpage
    def pageurl(self,response):
        # print(response.url)
        post_urls = response.css(".read-more a::attr(href)")
        for post_url in post_urls: # 当前页的所有文章链接
            # print(post_url.extract())
            url=post_url.extract()
            # print(url)
            yield scrapy.Request(url, callback=self.parse_detail, dont_filter=True)


