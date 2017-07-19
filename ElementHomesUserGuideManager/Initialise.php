<?php
namespace elementhomes;
use SQLite3;

include_once("Configure.php");

$init = new InitialiseDatabase();


//$init->KillAllTables();
$init->CreateTables();

echo $init->EnumerateDatabase();

class InitialiseDatabase extends SQLite3{


    function __construct()
    {
        $this->open('../westgateview/data/westgateview.db');
    }

    public function CreateTable($tablename, $sql)
    {
        echo "<p>Creating table '".$tablename."': ";
        $this->callexec($sql);
        echo "</p>";

    }

    public function KillAllTables(){
        $this->DropTable("Floors");
        $this->DropTable("FloorPlans");
        $this->DropTable("Rooms");
        $this->DropTable("Components");
        $this->DropTable("HouseDetails");
        $this->DropTable("ComponentGroups");
        $this->DropTable("Locations");
        $this->DropTable("DocumentationItems");

    }

    private function DropTable($tablename)
    {
        echo "<p>Dropping table '".$tablename."': ";
        $sql = "DROP TABLE IF EXISTS ".$tablename.";";
        $this->callexec($sql);
        echo "</p>";

    }


    private function callexec($sql)
    {
        $res=$this->exec($sql);
        if(!$res)
        {echo "failed";}
        else
        {echo "succeeded";}
    }

    public function EnumerateDatabase(){
        $gettablessql =<<<EOF
SELECT * FROM sqlite_master WHERE type='table';
EOF;



        $tablelisthtml = '<h2>Tables In The Database:</h2><ul style="list-style-type:disc">';

        try {
            $tablesresult = $this->query($gettablessql);
        }
        catch (Exception $e) {
            $tablelisthtml.='<li>Exception: '.$e->getMessage().'</li>';
            echo $e->getMessage();
        }

        if(!$tablesresult)
        {

        }
        else
        {
            while($tableitem = $tablesresult->fetchArray(SQLITE3_ASSOC)){
                $tablename = $tableitem['name'];

                $tablelisthtml.='<li>'.$tableitem['name'].'</li>';
            }
        }
        $tablelisthtml.='</ul>';

        foreach($tablelist as $table)
        {

        }

        $enumhtml = $tablelisthtml;
        return $enumhtml;
    }

    public function CreateTables(){
        $this->CreateFloors();
        $this->CreateFloorPlans();
        $this->CreateRooms();
        $this->CreateComponents();
        $this->CreateComponentGroups();
        $this->CreateLocations();
        $this->CreateDocumentationItem();
        $this->CreateHouseDetails();
    }

    public function CreateStoredProcs(){

    }

    private function CreateFloors(){
        $table = "Floors";
        $sql = "CREATE TABLE IF NOT EXISTS Floors(FloorID integer PRIMARY KEY, FloorName text, FloorLevel integer);";
		  $sql .= "CREATE UNIQUE INDEX idx_FloorName ON Floors(FloorName);";
        $sql .= "CREATE UNIQUE INDEX idx_FloorLevel ON Floors(FloorLevel);";
        $this->CreateTable($table,$sql);
    }

    private function CreateFloorPlans(){

        $table = "FloorPlans";
        $sql = "CREATE TABLE IF NOT EXISTS FloorPlans(FloorPlanID integer PRIMARY KEY, FloorPlanName text, FloorPlanFile text);";
        $sql .= "CREATE UNIQUE INDEX idx_FloorPlanFile ON FloorPlans(FloorPlanFile);";
        $sql .= "CREATE UNIQUE INDEX idx_FloorPlanName ON FloorPlans(FloorPlanName);";
        $this->CreateTable($table,$sql);
    }

    private function CreateRooms(){
        $table = "Rooms";
        $sql = "CREATE TABLE IF NOT EXISTS Rooms(RoomID integer PRIMARY KEY, RoomName text, FloorID integer, LocationID integer);";
		  $sql .= "CREATE UNIQUE INDEX idx_RoomName ON Rooms(RoomName);";
        $this->CreateTable($table,$sql);

    }

    private function CreateComponents(){
        $table = "Components";
        $sql = "CREATE TABLE IF NOT EXISTS Components(ComponentID integer PRIMARY KEY, ComponentGroupID integer, ComponentName text, LocationID integer);";
		  $sql .= "CREATE UNIQUE INDEX idx_ComponentName ON Components(ComponentName);";
        $this->CreateTable($table,$sql);

    }

    private function CreateHouseDetails(){
        $table = "HouseDetails";
        $sql = "CREATE TABLE IF NOT EXISTS HouseDetails(HouseDetailID integer PRIMARY KEY, HouseDetailType text, HouseDetailText text);";
        $sql .= "CREATE UNIQUE INDEX idx_HouseDetailType ON HouseDetails(HouseDetailType);";
        $this->CreateTable($table,$sql);

    }


    private function CreateComponentGroups(){
        $table = "ComponentGroups";
        $sql = "CREATE TABLE IF NOT EXISTS ComponentGroups(ComponentGroupID integer PRIMARY KEY, ComponentGroupName text, ComponentGroupDescription text);";
		  $sql .= "CREATE UNIQUE INDEX idx_ComponentGroupName ON ComponentGroups(ComponentGroupName);";
        $this->CreateTable($table,$sql);

    }

    private function CreateLocations(){
        $table = "Locations";
        $sql = "CREATE TABLE IF NOT EXISTS Locations(LocationID integer PRIMARY KEY, LocationDescription text,FloorPlanID integer, LocationX float, LocationY float, Notes text);";
		  $sql .= "CREATE UNIQUE INDEX idx_LocationDescription ON Locations(LocationDescription);";
        $this->CreateTable($table,$sql);

    }

    private function CreateDocumentationItem(){
        $table = "DocumentationItems";
        $sql = "CREATE TABLE IF NOT EXISTS DocumentationItems(DocumentationItemID integer PRIMARY KEY, DocumentationDescription text, ComponentID integer, DocumentationFileLocation text);";
        $sql .= "CREATE UNIQUE INDEX idx_DocumentationDescription ON DocumentationItems(DocumentationDescription);";
        $sql .= "CREATE UNIQUE INDEX idx_DocumentationFileLocation ON DocumentationItems(DocumentationFileLocation);";
		  $this->CreateTable($table,$sql);

    }
}
?>