from bs4 import BeautifulSoup
import requests
import re


def make_soup(url):
    """
        Converts the response into a BeautifulSoup Object
        :param url: url
    """
    r = requests.get(url)
    soup = BeautifulSoup(r.content, "html.parser")
    return str(soup)


def get_url():
    """
        Returns the url from the ngrok local Admin Panel.
        :return url
    """
    string = make_soup("http://localhost:4040/status")
    matchObj = re.search(r'http://(.+?)ngrok.io', string)
    if matchObj:
        return matchObj.group()

