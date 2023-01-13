$(document).ready(() => {

    function getTerritories() {
        //ajax call
        $.ajax({
            //ajax call to fetch the data in given url
            type: "POST",
            url: 'api/getData.php',
            data: JSON.stringify({ url: 'https://netzwelt-devtest.azurewebsites.net/Territories/All' }),
            dataType: "json",
            success: (data) => {
                if (data === null) { //loop until it gets data
                    getTerritories();
                } else {

                    //function to fetch the data in heirarchy
                    function createTree(parentId, parentNode) {
                        var isDone = false; //check if the function is done
                        data.data.forEach(function (region) { //loop the fetch data
                            if (region.parent === parentId) { //check first the top level parent and finding all the parents
                                var parentDiv = document.createElement("div");
                                parentDiv.classList.add("card");
                                var childList = document.createElement("ul");
                                createTree(region.id, childList); //recursion 

                                if (childList.childElementCount > 0) { //checking if the data is a parent if yes then make it clickable header
                                    var parentHeading = document.createElement("div");
                                    parentHeading.classList.add("card-header", "clickable");
                                    parentHeading.setAttribute("data-bs-toggle", "collapse");
                                    parentHeading.setAttribute("data-bs-target", `#collapse${region.id}`);
                                    parentHeading.setAttribute("aria-expanded", "false");
                                    parentHeading.setAttribute("aria-controls", `collapse${region.id}`);
                                    parentHeading.setAttribute("style", "cursor:pointer");
                                    parentHeading.innerHTML = `<h5 class="mb-0"> ${region.name}</h5>`;
                                    parentDiv.appendChild(parentHeading);
                                    var parentCollapse = document.createElement("div");
                                    parentCollapse.classList.add("collapse");
                                    parentCollapse.setAttribute("id", `collapse${region.id}`);
                                    parentCollapse.appendChild(childList);
                                    parentDiv.appendChild(parentCollapse);
                                    parentNode.appendChild(parentDiv);
                                } else { //if not then dont make it clickable
                                    var contentDiv = document.createElement("div");
                                    contentDiv.classList.add("card-body");
                                    contentDiv.innerHTML = region.name;
                                    parentDiv.appendChild(contentDiv);
                                    parentNode.appendChild(parentDiv);
                                }
                            }
                        });
                        isDone = true;
                        if (isDone) { //once the process is done hide the spinner
                            document.getElementById('spinner').classList.add('hide');
                        }
                    }

                    var accordion = document.getElementById("accordion");
                    createTree(null, accordion);
                }




            },
        });
    }

    getTerritories();
});