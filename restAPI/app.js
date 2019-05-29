const express = require('express');
const fileUpload = require('express-fileupload');
const diff= require("../diff/jsdiff")
const fs=require("fs");
const app = express();

// default options
app.use(fileUpload());

app.get('/diff/:id',(req,res)=>{
    //check if the file exists in the upload dir
    //compare it with the on with the same name in the server dir
    //return the html response using the function diff
    let idd = req.params.id;
    console.log(`u inserted ${idd}`);
    const upFile=fs.readFileSync(`../upload/${idd}`)
    const svFile=fs.readFileSync(`../server/${idd}`)
    console.log("processing...")
    res.send(diff.diffString(svFile,upFile));



})

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
  sampleFile.mv(`../upload/${sampleFile.name}`, function(err) {
    if (err)
      return res.status(500).send(err);

    res.send('File uploaded!');
  });
});
app.listen(4000,()=>{
    console.log("app started at port 4000")
})
