

import re
from urllib2 import Request, urlopen, URLError

request = Request('http://www.theguardian.com/uk/rss')
f=open("theguardian_rssfeed.xml",'w')
response = urlopen(request)
news = response.read()
f.write(news)
print "grabbing completed"



title = re.compile(ur'<title>(.+)<\/title>')
link = re.compile(ur'<link>(.+)<\/link>')
desc = re.compile(ur'<description>(.+)<\/description>')
pubDate = re.compile(ur'<pubDate>(.+)<\/pubDate>')

f.close()
f=open("theguardianuk.xml",'r').readlines()
f=open('theguardian_rss.xml', 'w').writelines(f[18:-1])
f=open('theguardian_rss.xml','r')
test_str =f.read()
title_retu=re.findall(title, test_str)
link_retu=re.findall(link, test_str)
desc_retu=re.findall(desc, test_str)
pubDate_retu=re.findall(pubDate, test_str)

for i in title_retu:
	print i
	

