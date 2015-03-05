<div class="container" id="content">
    <table class="results, manage">
        <tr>
            <th>ID</th>
            <th>Phone</th>
            <th>Name</th>
            <th>Image</th>
            <th>Manage</th>
        </tr>
        {sleeps}
        <tr>
            <td>{id}</td>
            <td>{phoneId}</td>
            <td>{title}</td>
            <td>
                <img src="/assets/images/{image}" alt="pic">
            </td>
            <td>
                <a href="/adminsleeps/edit/{id}">Edit</a> | 
                <a href="/adminsleeps/delete/{id}">Delete</a>
            </td>
        </tr>
        {/sleeps}
    </table>
</div>
<br/>
<a href="/adminsleeps/add">Add Sleep</a>
<br/>
<a href="/admin">Go back</a>