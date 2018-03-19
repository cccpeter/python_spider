# -*- coding: utf-8 -*-

# Define here the models for your scraped items
#
# See documentation in:
# http://doc.scrapy.org/en/latest/topics/items.html

import scrapy
from scrapy.loader import ItemLoader
from scrapy.loader.processors import MapCompose, TakeFirst, Join

class ArticlespiderItem(scrapy.Item):
    # define the fields for your item here like:
    # name = scrapy.Field()
    pass
class ArticleItemLoader(ItemLoader):
    #自定义itemloader
    default_output_processor = TakeFirst()
from ArticleSpider.models.es_types import ArticleType
from w3lib.html import remove_tags
from elasticsearch_dsl.connections import connections
es = connections.create_connection(ArticleType._doc_type.using)
def gen_suggests(index, info_tuple):
    #根据字符串生成搜索建议数组
    used_words = set()
    suggests = []
    for text, weight in info_tuple:
        if text:
            #调用es的analyze接口分析字符串
            words = es.indices.analyze(index=index, params={'filter':["lowercase"]}, body=text)
            anylyzed_words = set([r["token"] for r in words["tokens"] if len(r["token"])>1])
            new_words = anylyzed_words - used_words
        else:
            new_words = set()

        if new_words:
            suggests.append({"input":list(new_words), "weight":weight})

    return suggests

class ArticleItem(scrapy.Item):
    title=scrapy.Field()
    times=scrapy.Field()
    redianzang=scrapy.Field()
    shoucang = scrapy.Field()
    pinglun = scrapy.Field()
    context = scrapy.Field()
    url=scrapy.Field()
    def save_to_es(self):
        article = ArticleType()
        article.title = self['title']
        article.times = self['times']
        article.redianzang = self['redianzang']
        article.shoucang = self['shoucang']
        article.pinglun = self['pinglun']
        article.context = remove_tags(self['context'])
        print(article.context)
        article.url = self['url']
        # 建议词在es中的格式[{"input":[],"weight":2}]
        article.suggest=gen_suggests(ArticleType._doc_type.index,((article.title,10),(article.context,7)))
        article.save()
        return



class UserItem(scrapy.Item):
    # define the fields for your item here like:
    id = scrapy.Field()
    name = scrapy.Field()
    avatar_url = scrapy.Field()
    headline = scrapy.Field()
    description = scrapy.Field()
    url = scrapy.Field()
    url_token = scrapy.Field()
    gender = scrapy.Field()
    cover_url = scrapy.Field()
    type = scrapy.Field()
    badge = scrapy.Field()
    answer_count = scrapy.Field()
    articles_count = scrapy.Field()
    commercial_question_count = scrapy.Field()
    favorite_count = scrapy.Field()
    favorited_count = scrapy.Field()
    follower_count = scrapy.Field()
    following_columns_count = scrapy.Field()
    following_count = scrapy.Field()
    pins_count = scrapy.Field()
    question_count = scrapy.Field()
    thank_from_count = scrapy.Field()
    thank_to_count = scrapy.Field()
    thanked_count = scrapy.Field()
    vote_from_count = scrapy.Field()
    vote_to_count = scrapy.Field()
    voteup_count = scrapy.Field()
    following_favlists_count = scrapy.Field()
    following_question_count = scrapy.Field()
    following_topic_count = scrapy.Field()
    marked_answers_count = scrapy.Field()
    mutual_followees_count = scrapy.Field()
    hosted_live_count = scrapy.Field()
    participated_live_count = scrapy.Field()
    locations = scrapy.Field()
    educations = scrapy.Field()
    employments = scrapy.Field()

from datetime import datetime
from elasticsearch_dsl import DocType, Date, Nested, Boolean, \
    analyzer, InnerDoc, Completion, Keyword, Text

html_strip = analyzer('html_strip',
    tokenizer="standard",
    filter=["standard", "lowercase", "stop", "snowball"],
    char_filter=["html_strip"]
)

class Comment(InnerDoc):
    author = Text(fields={'raw': Keyword()})
    content = Text(analyzer='snowball')
    created_at = Date()

    def age(self):
        return datetime.now() - self.created_at

