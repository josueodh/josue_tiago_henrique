<table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Nota</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $total_students = $team->students()->get();
        foreach ($total_students as $student) {
            $grade = $student->grades()->where('team_id', $team->id)->get();
            if ($grade->count() > 0) {
                $grade = $grade->sum('grade') / $grade->count();
                }
    ?>
        <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$grade}}</td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>