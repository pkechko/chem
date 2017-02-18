/**
 * Created by pavelkechko on 2/17/17.
 */

//add calculation of positioning based on formula H2O https://www.google.lv/search?q=h2o&biw=1680&bih=884&source=lnms&tbm=isch&sa=X&ved=0ahUKEwj646nw1JbSAhXHYpoKHYX0BBQQ_AUIBigB#tbm=isch&q=h2o+molecule
// http://www.utc.edu/faculty/tom-rybolt/pdfs/molecular-structure.pdf
var calculatePositions =  function (formula) {


    var list=getList(formula);


    return list;
}

// get formated list of elements

var getList = function (formula) {


        var breakdown = formula.match(/[a-zA-Z]+|[0-9]+/g);

        var structure=[];
        var elementCount = 0;
        for (i = 0; i < breakdown.length; i++) {
            if (breakdown[i].match(/[a-zA-Z]+/g)){
                console.log(breakdown[i]);
                //structure[elementCount] = new Array(element,quantity);

                structure[elementCount] = new Array(breakdown[i],1);

                elementCount++;

            } else {
                structure[elementCount-1][1] = breakdown[i];
            }
        }

    return structure;
}


// get number of elements
var getNumber = function (list) {


    return
}

