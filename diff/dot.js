import {diffString} from 'jsdiff.js'
const fs=require('fs');
function dot(o,p)
{
    oo=fs.readFileSync(o);
    pp=fs.readFileSync(p);
    return diffString(oo,pp);
    
}
