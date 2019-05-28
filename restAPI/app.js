const express = require('express');
const fileUpload = require('express-fileupload');
const app = express();

// default options
app.use(fileUpload());

app.post('/upload', function(req, res) {
    console.log("entered at /upload")
  if (Object.keys(req.files).length == 0) {
    return res.status(400).send('No files were uploaded.');
    console.log("no files found")
  }
  

  // The name of the input field (i.e. "sampleFile") is used to retrieve the uploaded file
  let sampleFile = req.files.sampleFile;
  console.dir(sampleFile);

  // Use the mv() method to place the file somewhere on your server
  sampleFile.mv(`C:/Users/Nabil/Desktop/PFA/test/${sampleFile.name}`, function(err) {
    if (err)
      return res.status(500).send(err);

    res.send('File uploaded!');
  });
});
app.listen(4000,()=>{
    console.log("app started at port 4000")
})
