# listes des branches a mettre a jours
$branches = @("Esteban", "Beny", "David", "Florian", "Gwendoline", "NADIFIsara","Mario", "Maelle")

Write-Host "Liste des branches :"
git checkout main
git pull origin main

foreach ($branch in $branches) {
    Write-Host $branch
    git checkout $branch
    git merge main
    git push origin $branch
    git pull origin $branch
}

Write-Host "Fin du script"
git checkout main
