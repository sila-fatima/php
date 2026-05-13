const fs = require("fs")
const action = process.argv[2];
const filename = process.rgv[3];
const data = process.argv[4];



if(action == "create"){
    fs.writeFileSync(filename,data);
}
else if(action == "delete"){
    fs.unlinkSync(filename);
}
else {
    console.log("invaid action");
}