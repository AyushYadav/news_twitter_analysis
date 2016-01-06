import httplib2, re
from urllib2 import Request, urlopen, URLError


request = Request('http://www.thehindu.com/news/?service=rss')
f=open("hindu_rssfeed.xml",'w')
try:
	response = urlopen(request)
	news = response.read()
	f.write(news)
	print "grabbing completed"
except URLError, e:
    print 'Got an error code:', e