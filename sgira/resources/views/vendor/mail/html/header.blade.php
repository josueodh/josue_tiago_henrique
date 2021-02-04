<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/71/Logo_da_UFJF.png/800px-Logo_da_UFJF.png" class="logo"   alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
