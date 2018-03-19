# *_*_ coding:utf-8 _*_
from scrapy.cmdline import  execute
import sys,os
# sys.path.append("G:\pythoncode\ArticleSpider")
sys.path.append(os.path.dirname(os.path.abspath(__file__)))
print(os.path.dirname(os.path.abspath(__file__)))
execute(["scrapy","crawl","jobbole"])