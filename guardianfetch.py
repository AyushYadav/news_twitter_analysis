

import re
from urllib2 import Request, urlopen, URLError

request = Request('http://www.theguardian.com/uk/rss')
f=open("theguardian_rssfeed.xml",'w')
response = urlopen(request)
news = response.read()
f.write(news)
f.close()
print "Grabbing completed"


#Regex used for various tags
title = re.compile(ur'<title>(.+)<\/title>')
link = re.compile(ur'<link>(.+)<\/link>')
desc = re.compile(ur'<description>(.+)<\/description>')
pubDate = re.compile(ur'<pubDate>(.+)<\/pubDate>')


f=open("theguardianuk.xml",'r').readlines()
f=open('theguardian_rss.xml','w').writelines(f[18:-1]) #Removing the top content which is irrelevant
f=open('theguardian_rss.xml','r')

test_str =f.read()
title_retu=re.findall(title, test_str)
link_retu=re.findall(link, test_str)
desc_retu=re.findall(desc, test_str)
pubDate_retu=re.findall(pubDate, test_str)

#Counting the no of news
sz=len(title_retu)
fo=open("refined_out_guardian.txt",'w') #Creating the output file
for x in xrange(1,sz):
	fo.write(title_retu[x])
	fo.write("\n")
	fo.write(pubDate_retu[x])
	fo.write("\n")
	fo.write(link_retu[x])
	fo.write("\n")
	fo.write(desc_retu[x])
	fo.write("\n")
	fo.write("\n")


fo.close()

