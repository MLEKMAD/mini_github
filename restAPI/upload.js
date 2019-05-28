const express = require('express');
const fileUpload = require('express-fileupload');
const app = express();

// default options
app.use(fileUpload());

app.post('/upload', function (req, res) {
    if (Object.keys(req.files).length == 0) {
        return res.status(400).send('No files were uploaded.');
    }
    console.dir(req.files)
    // The name of the input field (i.e. "sampleFile") is used to retrieve the uploaded file
    let sampleFile = req.files.sampleFile;

    // Use the mv() method to place the file somewhere on your server
    sampleFile.mv('./toot/file', function (err) {
        if (err) {
            console.dir(err)
            return res.status(500).send(err);
        }

        res.send('File uploaded!');
    });
});
app.listen(4000, () => { console.log('app starting on port 4000') })