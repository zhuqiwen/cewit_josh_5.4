<tr class="child_row" style="display: none">
    <td colspan="5">
        <div>
            <?php
                $contents = [
                    'rank' => [
                            'title' => 'Rank',
                            'content' => $ctFaculty->rank,
                    ],
                    'title' => [
                            'title' => 'Administrative Title',
                            'content' => $ctFaculty->administrative_title,
                    ],
                    'campus' => [
                            'title' => 'Campus',
                            'content' => $ctFaculty->campus,
                    ],
                    'school' => [
                            'title' => 'School',
                            'content' => $ctFaculty->school,
                    ],
                    'department' => [
                            'title' => 'Department',
                            'content' => $ctFaculty->department,
                    ],

                ];

                echo \app\UiHelpers\containers::tabs($ctFaculty->id, $contents);
            ?>
        </div>
    </td>

</tr>