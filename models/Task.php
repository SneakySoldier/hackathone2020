<?php

require_once 'Database.php';
require_once 'File.php';

class Task
{
    public static function get($studentId, $subjectId, $weekId)
    {
        $sql = "
            select
                t.*,
                concat(ut.familiya, ' ', ut.name, ' ', ut.otchestvo) as teacher_name,
                f.title as file_title,
                concat('/uploads/', f.uuidCode, f.title) as file_path
            from tasks t
            join files f on t.file_id = f.id
            join users ut on ut.id = t.teacher_id
            join users us on us.id = t.student_id
            join weeks w on w.id = t.week_id
            where t.student_id = ".$studentId." and t.subject_id = ".$subjectId." and t.week_id = ".$weekId."
        ";
        return Database::query($sql)[0];
    }

    public static function create($title, $teacherId, $studentId, $subjectId, $weekId, $file = null)
    {
        $fileId = null;
        if ($file) $fileId = File::upload($file);
        $sql = "
            INSERT INTO tasks (
                teacher_id,
                student_id,
                subject_id,
                week_id,
                file_id,
                title
            ) VALUES (
                ".$teacherId.",
                ".$studentId.",
                ".$subjectId.",
                ".$weekId.",
                ".$fileId.",
                \"".$title."\"
            );
        ";
        Database::exec($sql);
    }
}
