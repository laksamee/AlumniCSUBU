<head>
<script src="js/go.js"></script>
<script id="code">
  function init() {
    if (window.goSamples) goSamples();  // init for these samples -- you don't need to call this
    var $ = go.GraphObject.make;  // for conciseness in defining templates

    myDiagram =
      $(go.Diagram, "myDiagramDiv", // must be the ID or reference to div
        {
          initialContentAlignment: go.Spot.Center,
          maxSelectionCount: 1, // users can select only one part at a time
          validCycle: go.Diagram.CycleDestinationTree, // make sure users can only create tree

          layout:
            $(go.TreeLayout,
              {
                treeStyle: go.TreeLayout.StyleLastParents,
                arrangement: go.TreeLayout.ArrangementHorizontal,
                // properties for most of the tree:
                angle: 90,
                layerSpacing: 35,
                // properties for the "last parents":
                alternateAngle: 90,
                alternateLayerSpacing: 35,
                alternateAlignment: go.TreeLayout.AlignmentBus,
                alternateNodeSpacing: 20
              }),
          "undoManager.isEnabled": true // enable undo & redo
        });


    var levelColors = ["#AC193D", "#2672EC", "#8C0095", "#5133AB",
                       "#008299", "#D24726", "#008A00", "#094AB2"];

    // override TreeLayout.commitNodes to also modify the background brush based on the tree depth level
    myDiagram.layout.commitNodes = function() {
      go.TreeLayout.prototype.commitNodes.call(myDiagram.layout);  // do the standard behavior
      // then go through all of the vertexes and set their corresponding node's Shape.fill
      // to a brush dependent on the TreeVertex.level value
      myDiagram.layout.network.vertexes.each(function(v) {
        if (v.node) {
          var level = v.level % (levelColors.length);
          var color = levelColors[level];
          var shape = v.node.findObject("SHAPE");
          if (shape) shape.fill = $(go.Brush, "Linear", { 0: color, 1: go.Brush.lightenBy(color, 0.05), start: go.Spot.Left, end: go.Spot.Right });
        }
      });
    };

    // when a node is double-clicked, add a child to it
    function nodeDoubleClick(e, obj) {
      }

    // this is used to determine feedback during drags
    function mayWorkFor(node1, node2) {
      if (!(node1 instanceof go.Node)) return false;  // must be a Node
      if (node1 === node2) return false;  // cannot work for yourself
      if (node2.isInTreeOf(node1)) return false;  // cannot work for someone who works for you
      return true;
    }

    // This function provides a common style for most of the TextBlocks.
    // Some of these values may be overridden in a particular TextBlock.
    function textStyle() {
      return { font: "9pt  Segoe UI,sans-serif", stroke: "white" };
    }

    // This converter is used by the Picture.
    function findHeadShot(key) {
      if (key < 0 || key > 16) return "images/HSnopic.png"; // There are only 16 images on the server
      return "images/HS" + key + ".png"
    }

    // define the Node template
    myDiagram.nodeTemplate =
      $(go.Node, "Auto",
        $(go.Shape, "Rectangle",
          {
            name: "SHAPE", fill: "white", stroke: null,
            // set the port properties:
            portId: "", fromLinkable: true, toLinkable: true, cursor: "pointer"
          }),
        $(go.Panel, "Horizontal",
          $(go.Picture,
            {
              name: "Picture",
              desiredSize: new go.Size(39, 50),
              margin: new go.Margin(6, 8, 6, 10),
            },
            new go.Binding("source", "key", findHeadShot)),
          // define the panel where the text will appear
          $(go.Panel, "Table",
            {
              maxSize: new go.Size(150, 999),
              margin: new go.Margin(6, 10, 0, 3),
              defaultAlignment: go.Spot.Left
            },
            $(go.RowColumnDefinition, { column: 2, width: 4 }),
            $(go.TextBlock, textStyle(),  // the name
              {
                row: 0, column: 0, columnSpan: 5,
                font: "12pt Segoe UI,sans-serif",
                editable: true, isMultiline: false,
                minSize: new go.Size(10, 16)
              },
              new go.Binding("text", "name").makeTwoWay()),
            $(go.TextBlock, "Title: ", textStyle(),
              { row: 1, column: 0 }),
            $(go.TextBlock, textStyle(),
              {
                row: 1, column: 1, columnSpan: 4,
                editable: true, isMultiline: false,
                minSize: new go.Size(10, 14),
                margin: new go.Margin(0, 0, 0, 3)
              },
              new go.Binding("text", "title").makeTwoWay()),
            $(go.TextBlock, textStyle(),
              { row: 2, column: 0 },
              new go.Binding("text", "key", function(v) {return "ID: " + v;})),
            $(go.TextBlock, textStyle(),
              { name: "boss", row: 2, column: 3, }, // we include a name so we can access this TextBlock when deleting Nodes/Links
              new go.Binding("text", "parent", function(v) {return "Boss: " + v;})),
            $(go.TextBlock, textStyle(),  // the comments
              {
                row: 3, column: 0, columnSpan: 5,
                font: "italic 9pt sans-serif",
                wrap: go.TextBlock.WrapFit,
                editable: true,  // by default newlines are allowed
                minSize: new go.Size(10, 14)
              },
              new go.Binding("text", "comments").makeTwoWay())
          )  // end Table Panel
        ) // end Horizontal Panel
      );  // end Node

    // define the Link template
    myDiagram.linkTemplate =
      $(go.Link, go.Link.Orthogonal,
        { corner: 5, relinkableFrom: true, relinkableTo: true },
        $(go.Shape, { strokeWidth: 4, stroke: "#00a4a4" }));  // the link shape

    // read in the JSON-format data from the "mySavedModel" element
    load();


    // support editing the properties of the selected person in HTML
    if (window.Inspector) myInspector = new Inspector("myInspector", myDiagram,
      {
        properties: {
          "key": { readOnly: true },
          "comments": {}
        }
      });
  }

  // Show the diagram's model in JSON format
  function load() {
    myDiagram.model = go.Model.fromJson(document.getElementById("mySavedModel").value);
  }
</script>
</head>
<body onload="init()">
<div id="sample">
  <div id="myDiagramDiv" style="background-color: #696969; border: solid 1px black; height: 500px"></div>
  <div>
    <div id="myInspector">

    </div>
  </div>

  <div>
    <textarea id="mySavedModel" style="width:100%;height:250px">
{ "class": "go.TreeModel",
  "nodeDataArray": [
{"key":1, "name":"Stella Payne Diaz", "title":"CEO"},
{"key":2, "name":"Luke Warm", "title":"VP Marketing/Sales", "parent":1},
{"key":3, "name":"Meg Meehan Hoffa", "title":"Sales", "parent":2},
{"key":4, "name":"Peggy Flaming", "title":"VP Engineering", "parent":1},
{"key":5, "name":"Saul Wellingood", "title":"Manufacturing", "parent":4},
{"key":6, "name":"Al Ligori", "title":"Marketing", "parent":2},
{"key":7, "name":"Dot Stubadd", "title":"Sales Rep", "parent":3},
{"key":8, "name":"Les Ismore", "title":"Project Mgr", "parent":5},
{"key":9, "name":"April Lynn Parris", "title":"Events Mgr", "parent":6},
{"key":10, "name":"Xavier Breath", "title":"Engineering", "parent":4},
{"key":11, "name":"Anita Hammer", "title":"Process", "parent":5},
{"key":12, "name":"Billy Aiken", "title":"Software", "parent":10},
{"key":13, "name":"Stan Wellback", "title":"Testing", "parent":10},
{"key":14, "name":"Marge Innovera", "title":"Hardware", "parent":10},
{"key":15, "name":"Evan Elpus", "title":"Quality", "parent":5},
{"key":16, "name":"Lotta B. Essen", "title":"Sales Rep", "parent":3}
 ]
}
    </textarea>
  </div>
</div>
</body>

<div class="container">
  <div class="container">
    <div class="row">
        <div class="panel-heading">  <h4 >ประวัติส่วนตัว</h4></div>
        <div class="container">
          <div class="row">
          <div class="panel-body">
            <div class="row" >
             <div class="col-md-3 " >
               @if($user->profile != null)
               <img src="/user/profile/{{$user->profile}}"alt="" width="100%" align="center">
               @else
               <img src="/user/profile/no_img.jpg" alt="" width="100%">
               @endif
             </div>
             <div class="col-md-9 " >
                 <div class="container" >
                   <h2>{{$user->name}}</h2>
                  <hr>
                 <div class="cbp-l-member-desc">
               		<h4><p><span>รุ่นที่ </span> : {{$user->generation}}</p></h4>
               		<h4><p><span>ปีที่จบการศึกษา</span> : {{$user->years}}</p></h4>
               		<h4><p><span>ที่อยู่</span> : {{$user->address}}</p></h4>
               		<h4><p><span>สถานที่ทำงาน</span> : </p></h4>
                  <h4><p><span>เอกสารโครงงาน</span> :
                    @if($user->senior_project != null)
                     <a href="user\file\{{$user->senior_project}}"><i class=""></i>{{$user->senior_project}}</a>
                  @endif
                  </p></h4>
               		<a href=""><h3><p><span>สายเทค</span></p></h4></a>
               	</div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        @if($user->video_project != null)
          <div class= "row" align ="center" >
        		<div class="col-md-12 ">
        			<video  width="70%" controls>
        				<source src="/user/video_project/{{$user->video_project}}" type="video/mp4" >
        			</video><br><br>
        		</div>
        </div>
     @endif

    </div>
  </div>
</div>
