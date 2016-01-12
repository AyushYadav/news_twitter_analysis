import re
from urllib2 import Request, urlopen, URLError

request = Request('http://www.thehindu.com/news/?service=rss')
f=open("hindu_rssfeed.xml",'w')
response = urlopen(request)
news = response.read()
f.write(news)
print "grabbing completed"
p = re.compile(ur'<title>(.+)<\/title>')
p = re.compile(ur'<link>(.+)<\/link>')
p = re.compile(ur'<description>(.+)<\/description>')


f.close()
f=open("hindu_rssfeed.xml",'r')
test_str =f.read()
retu=re.findall(p, test_str)
print retu

