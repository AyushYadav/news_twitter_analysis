import re
from urllib2 import Request, urlopen, URLError

request = Request('http://www.thehindu.com/news/?service=rss')
f=open("hindu_rssfeed.xml",'r+')
response = urlopen(request)
news = response.read()
f.write(news)
f=f.read().replace("CDATA",'')
print "grabbing completed"
p = re.compile(ur'<title>(.+)<\/title>')
test_str =f.read()
retu=re.findall(p, test_str)
print retu

