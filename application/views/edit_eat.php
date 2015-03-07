<div class="row, container" id="content">
    <div class="errors">
        {message}
    </div>
    <form action="/AdminEats/confirm/{id}" method="post">
        {form_phoneId}
        {form_title}
        {form_image}
        {form_desc}
        {form_value}
        {form_rating}
        {form_link}
        <br/>
        {submit}
    </form>
</div>

<br/>
<a href="/AdminEats" role="button" class="btn btn-default">Go Back</a>