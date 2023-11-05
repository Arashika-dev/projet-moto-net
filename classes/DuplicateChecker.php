<?php 


class DuplicateChecker
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * This function checks if an item is already present in the database
     *
     * @param string $toCheck The string you want to verify (email or pseudo)
     * @param string $object The remainder of the column name in the user table (email or username) to conform to the format user_columnName
     * @return boolean
     */
    public function isDuplicate(string $toCheck, string $object, int $excludeUserId = null): bool
    {
        $query = 'SELECT COUNT(*) FROM users WHERE user_' . $object . '= :element';

        if ($excludeUserId !== null) {
            $query .= ' AND user_id != :excludeId';
        }

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':element', $toCheck);

        if ($excludeUserId !== null) {
            $stmt->bindValue(':excludeId', $excludeUserId);
        }

        $stmt->execute();

        $count = $stmt->fetchColumn();

        return $count > 0;
    }

}