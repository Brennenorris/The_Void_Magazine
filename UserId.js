// Retrieve the unique ID from the cookie
const storedToken = document.cookie
  .split('; ')
  .find(row => row.startsWith('userToken='))
  .split('=')[1];

if (storedToken) {
  // User is logged in, and you have the unique ID
  console.log("User is logged in with ID:", storedToken);
  // You can use storedToken for further authentication or API requests
} else {
  // User is not logged in or the token is not found
  console.log("User is not logged in");
}
