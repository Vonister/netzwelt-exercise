$(document).ready(() => {
    var tree =  $('#tree');
    var rootList = document.createElement("ul");
    //ajax call
    $.ajax({
        //ajax call to fetch the data in given url
        type: "POST",
        url: 'api/getData.php',
        data: JSON.stringify({ url: 'https://netzwelt-devtest.azurewebsites.net/Territories/All' }),
        dataType: "json",
        success: (response) => {

            //if fetch data call this function
            function createTree(parentId, parentNode) {
                //loop the data
                response.data.forEach(function (region) {
                    if (region.parent === parentId) { //find the data that has the same parentID
                        var childNode = document.createElement("li"); 
                        childNode.innerHTML = region.name; //list the true data
                        parentNode.append(childNode);
                        //create new ul tag for the child if it has child
                        var childList = document.createElement("ul");
                        //call the function recursively
                        createTree(region.id, childList);
                        childNode.append(childList);
                    }
                });
            }
            createTree(null, rootList); //find the top level parent first which can be find by using the parent = null
            tree.append(rootList); // append data generated html to div

        },
    });

});