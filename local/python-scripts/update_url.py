from urllib.parse import urlencode
from urllib.request import Request, urlopen


def update_url(username, password, lock_url):
    """
        Updates the URL in a remote database by making a post request to a remote API.
        :param username: Name of the user
        :param password: Password of the userte
        :param lock_url: Lock URL
    """
    url = 'http://lockme.pe.hu/remote_lock_server_file.php' # Set destination URL here
    post_fields = {'user': username, 'user_key': password, 'url': lock_url}     # Set POST fields here
    request = Request(url, urlencode(post_fields).encode())
    json = urlopen(request).read()
    print(json)


def get_url_from_database(username, password):
    """
        Retrieves the URL from a remote database.
        :param username: Name of the user
        :param password: Password of the user
    """
    url = 'http://lockme.pe.hu/remote_lock_server_get_url.php'  # Set destination URL here
    post_fields = {'user': username, 'user_key': password}  # Set POST fields here
    request = Request(url, urlencode(post_fields).encode())
    json = urlopen(request).read().decode()
    print(json)
