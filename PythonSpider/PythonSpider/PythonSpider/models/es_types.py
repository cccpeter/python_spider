# -*- coding: utf-8 -*-
from datetime import datetime
from elasticsearch_dsl import DocType, Date, Nested, Boolean, \
    analyzer, InnerDoc, Completion, Keyword, Text
from elasticsearch_dsl.connections import connections
connections.create_connection(hosts=["localhost"])
from elasticsearch_dsl.analysis import CustomAnalyzer as _CustomAnalyzer
class CustomAnalyzer(_CustomAnalyzer):
    def get_analysis_definition(self):
        return {}


ik_analyzer = CustomAnalyzer("ik_max_word", filter=["lowercase"])
class ArticleType(DocType):
    suggest=Completion(analyzer=ik_analyzer)
    title=Text(analyzer="ik_max_word")
    times=Text(analyzer="ik_max_word")
    redianzang=Text(analyzer="ik_max_word")
    shoucang = Text(analyzer="ik_max_word")
    pinglun = Text(analyzer="ik_max_word")
    context = Text(analyzer="ik_max_word")
    url=Keyword()


    class Meta:
        index="jobbole"
        doc_type="article"

if __name__=="__main__":
    ArticleType.init()
