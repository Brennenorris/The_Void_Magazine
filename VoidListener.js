const express = require('express');
const bodyParser = require('body-parser');
const app = express();
const port = 3000;

app.use(bodyParser.json());

app.post('/track-click', (req, res) => {
  const { elementId, clickCount } = req.body;
  console.log(`Element ${elementId} clicked. Total clicks: ${clickCount}`);
  // Store the data in a database or other persistent storage if needed
  res.sendStatus(200);
});

app.listen(port, () => {
  console.log(`Server listening at http://localhost:${port}`);
});
