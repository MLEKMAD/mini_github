
const express = require('express');

const upload =require("express-fileupload");
app.use(upload())
const router = express.Router();
const http=require('http').Server(app).listen(3000);
router.get("/",function(req,res){
    res.sendFile(__dirname+'//*SMIYA NTAA FIN KAYNA form*/');
})
router.post("/",function(req,res){
    if(req.files){
        const file=req.files.filename,
            filename=file.name;
            file.mv("./"+filename,function(err){
                if(err){
                    console.log(err);
                    res.send('error occured')
                }
                else{
                    res.send("done!")
                }
            })
    }
})
const button = document.getElementById('myButton');
button.addEventListener('click', action(id,state));
