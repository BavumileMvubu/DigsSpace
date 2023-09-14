<?php
// Include your database connection code here if needed

// Check if the user is logged in as an admin or has appropriate permissions
// You may need to implement user authentication and authorization

// Sample agent data (replace with actual data from your database)
$agents = array(
    array("id" => 1, "name" => "Agent 1", "email" => "agent1@example.com", "status" => "Active"),
    array("id" => 2, "name" => "Agent 2", "email" => "agent2@example.com", "status" => "Inactive"),
    array("id" => 3, "name" => "Agent 3", "email" => "agent3@example.com", "status" => "Active")
);

// Handle agent management actions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["edit"])) {
        // Handle edit action (open edit form or perform editing logic)
        // You can use the agent ID from the form to fetch agent details for editing
    } elseif (isset($_POST["deactivate"])) {
        // Handle deactivate action (change agent status to "Inactive" in the database)
        $agentId = $_POST["agent_id"];
        // Implement database update logic to change agent status
    } elseif (isset($_POST["activate"])) {
        // Handle activate action (change agent status to "Active" in the database)
        $agentId = $_POST["agent_id"];
        // Implement database update logic to change agent status
    } elseif (isset($_POST["assign"])) {
        // Handle assign action (assign agent to properties)
        // You can use the agent ID from the form to perform the assignment
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="manage_agent.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Agent Management</title>
</head>
<body>
<header class="admin-header">
        <div class="logo">
        <img src="images/logo.png" alt="DigsSpace Logo">
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Enter location to search...">
            <button class="search-button" type="submit" name="search"><i class="fas fa-search"></i> Search</button>
        </div>

        <div class="filter-button">
        <button type="submit" name="filter"><i class="fas fa-filter"></i> Filter</button>
        </div>

        <nav>
            <div class="admin-nav">
            <ul>
            <li><a href="admin_panel.php">Home</a></li>
                <li><a href="manage_agents.php">Manage Agents</a></li>
                <li><a href="generate_reports.php">Reports</a></li>
                <li><a href="admin_profile.php">Profile</a></li>
                <li><a href="admin_login.php">Logout</a></li>
            </ul>
            </div>
        </nav>
    </header>
    <div class="admin-content">
        <h1>Agent Management</h1>
        <div class="agent-list">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($agents as $agent): ?>
                        <tr>
                            <td><?php echo $agent['id']; ?></td>
                            <td><?php echo $agent['name']; ?></td>
                            <td><?php echo $agent['email']; ?></td>
                            <td><?php echo $agent['status']; ?></td>
                            <td>
                                <form method="POST">
                                    <!-- Edit button -->
                                    <button class="action-button" type="submit" name="edit">Edit</button>
                                    <!-- Deactivate button -->
                                    <?php if ($agent['status'] == 'Active'): ?>
                                        <button class="action-button" type="submit" name="deactivate">Deactivate</button>
                                    <?php endif; ?>
                                    <!-- Activate button -->
                                    <?php if ($agent['status'] == 'Inactive'): ?>
                                        <button class="action-button" type="submit" name="activate">Activate</button>
                                    <?php endif; ?>
                                    <!-- Assign button -->
                                    <button class="action-button" type="submit" name="assign">Assign</button>
                                    <input type="hidden" name="agent_id" value="<?php echo $agent['id']; ?>">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
