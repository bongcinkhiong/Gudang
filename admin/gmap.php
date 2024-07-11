<?php 

function getNearbyPointsOfInterest($latitude, $longitude, $radius) {
    // Connect to the database
    $conn = connectToDatabase();
    // Prepare the SQL query
    $sql = "SELECT * FROM points_of_interest WHERE 
            (latitude - :latitude) * (latitude - :latitude) + 
            (longitude - :longitude) * (longitude - :longitude) < :radius^2";
    // Bind parameters to the query
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":latitude", $latitude);
    $stmt->bindParam(":longitude", $longitude);
    $stmt->bindParam(":radius", $radius);
    // Execute the query and fetch results
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
};

?>

<script>
    function fetchNearbyPointsOfInterest(latitude, longitude, radius) {
    fetch(`/api/points-of-interest?latitude=${latitude}&longitude=${longitude}&radius=${radius}`)
        .then(response => response.json())
        .then(data => {
            // Process and display the retrieved points of interest on the frontend
        })
        .catch(error => {
            // Handle any errors that may occur during the API call
        });
    }

</script> 
