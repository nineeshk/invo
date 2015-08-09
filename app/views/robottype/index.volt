{{ content() }}

<div align="right">
    {{ link_to("robottype/new", "Create Robot Type", "class": "btn btn-primary") }}
</div>
{% block scripts %}
<script>
$(document).ready(function(){
$("#a1").click(function(){
	//alert("Test"); return false;
    });
});
</script>
{% endblock %}
<h2>Table</h2>

{% for robo in robottype %}
	{% if loop.first %}
		<table border="1" cellspacing="10">
		<tr>
			<th>#</th>
			<th>Id</th>
			<th>Name</th>	
			<th></th>
		</tr>
	{% endif %}
		<tr>
			<td><a href="{{ url("robottype/edit/" ~ robottype.idx) }}" title="">{{ loop.index }}</a></td>
			<td>{{ robo.idx }}</td>
			<td>{{ robo.typeName}}</td>
			<td><a href="{{ url("robottype/delete/" ~ robo.idx) }}" id="a{{ robo.idx }}" title="">Delete</a></td>
		</tr>
	{% if loop.last %}
		</table>
	{% endif %}
{% endfor %}