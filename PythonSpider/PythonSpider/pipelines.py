# -*- coding: utf-8 -*-

# Define your item pipelines here
#
# Don't forget to add your pipeline to the ITEM_PIPELINES setting
# See: http://doc.scrapy.org/en/latest/topics/item-pipeline.html


class ArticlespiderPipeline(object):
    def process_item(self, item, spider):
        return item
import MySQLdb
import pymongo
from twisted.enterprise import adbapi
class MysqlPipeline(object):
    def __init__(self,item,spider):
        self.conn = MySQLdb.connect('127.0.0.1', 'root', '', 'articlespider', charset="utf8",use_unicode=True)
        self.cursor = self.conn.cursor()
    def process_item(self,item,spider):
        insert_sql="""
        insert into article(title,times,redianzang,shoucang,pinglun,context)VALUE (%s,%s,%s,%s,%s,%s)
        """
        self.cursor.execute(insert_sql,(item['title'],item['times'],item['redianzang'],item['shoucang'],item['pinglun'],item['context']))
        self.conn.commit()
import MySQLdb.cursors
class MysqlTwistedPipline(object):
    def __init__(self, dbpool):
        self.dbpool = dbpool

    @classmethod
    def from_settings(cls, settings):
        dbparms = dict(
            host = settings["MYSQL_HOST"],
            db = settings["MYSQL_DBNAME"],
            user = settings["MYSQL_USER"],
            passwd = settings["MYSQL_PASSWORD"],
            charset='utf8',
            cursorclass=MySQLdb.cursors.DictCursor,
            use_unicode=True,
        )
        dbpool = adbapi.ConnectionPool("MySQLdb", **dbparms)

        return cls(dbpool)

    def process_item(self, item, spider):
        #使用twisted将mysql插入变成异步执行
        query = self.dbpool.runInteraction(self.do_insert, item)
        query.addErrback(self.handle_error, item, spider) #处理异常

    def handle_error(self, failure, item, spider):
        #处理异步插入的异常
        print (failure)

    def do_insert(self, cursor, item):
        #执行具体的插入
        #根据不同的item 构建不同的sql语句并插入到mysql中
        insert_sql = """
               insert into article(title,times,redianzang,shoucang,pinglun,context,url)VALUE (%s,%s,%s,%s,%s,%s,%s)
               """
        params =(item['title'], item['times'], item['redianzang'], item['shoucang'], item['pinglun'], item['context'],item['url'])
        cursor.execute(insert_sql, params)

class MongoPipeline(object):
        collection_name = 'users'

        def __init__(self, mongo_uri, mongo_db):
            self.mongo_uri = mongo_uri
            self.mongo_db = mongo_db

        @classmethod
        def from_crawler(cls, crawler):
            return cls(
                mongo_uri=crawler.settings.get('MONGO_URI'),
                mongo_db=crawler.settings.get('MONGO_DB')
            )

        def open_spider(self, spider):
            self.client = pymongo.MongoClient(self.mongo_uri)
            self.db = self.client[self.mongo_db]

        def close_spider(self, spider):
            self.client.close()

        def process_item(self, item, spider):
            self.db[self.collection_name].update({'url_token': item['url_token']}, {'$set': dict(item)}, True)
            return item

from ArticleSpider.models.es_types import ArticleType
from w3lib.html import remove_tags
class ElasticsearchPipeline(object):
    def process_item(self, item, spider):
        #将item转换为es的数据
        item.save_to_es()
        return item
