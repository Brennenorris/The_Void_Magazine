import requests

# Define the URL of the webpage you want to retrieve
url = 'https://www.thevoidcsu.com/'

# Send an HTTP GET request to the URL
response = requests.get(url)

# Check if the request was successful
if response.status_code == 200:
    # Print the HTML content of the webpage
    print(response.text)
else:
    print(f"Failed to retrieve the webpage. Status code: {response.status_code}")
