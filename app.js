const express = require('express');
const { MongoClient, ObjectId } = require('mongodb');
const bodyParser = require('body-parser');
const cors = require('cors');  // <-- Import the CORS package

const app = express();
app.use(cors());  // <-- Enable CORS for all requests
app.use(bodyParser.json());

const url = 'mongodb://localhost:27017';
const dbName = 'myDatabase';
let db;

MongoClient.connect(url, { useUnifiedTopology: true })
  .then((client) => {
    db = client.db(dbName);
    console.log(`Connected to database: ${dbName}`);
  })
  .catch((err) => console.error(err));

// Add a document
app.post('/add', (req, res) => {
  const newDocument = req.body;
  db.collection('myCollection').insertOne(newDocument)
    .then(result => res.send(`Document added with ID: ${result.insertedId}`))
    .catch(err => res.status(500).send(err));
});

// Get all documents
app.get('/view', (req, res) => {
  db.collection('myCollection').find().toArray()
    .then(docs => res.json(docs))
    .catch(err => res.status(500).send(err));
});

// Update a document by ID
app.put('/edit/:id', (req, res) => {
  const id = req.params.id;
  const updateDoc = { $set: req.body };

  db.collection('myCollection').updateOne({ _id: new ObjectId(id) }, updateDoc)
    .then(result => res.send(`Document updated`))
    .catch(err => res.status(500).send(err));
});

// Delete a document by ID
app.delete('/delete/:id', (req, res) => {
  const id = req.params.id;

  db.collection('myCollection').deleteOne({ _id: new ObjectId(id) })
    .then(result => res.send(`Document deleted`))
    .catch(err => res.status(500).send(err));
});

app.listen(3000, () => {
  console.log('Server is running on http://localhost:3000');
});

