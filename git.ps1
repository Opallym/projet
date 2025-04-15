# listes des branches a mettre a jours
$branches = @("Esteban", "Beny", "David", "Florian", "Gwendoline", "NADIFIsara","Mario", "Maelle")

# afficher les messages dans le terminal
Write-Host "=== passage a la branche main ==="

try
{
    # on ce place sur la branche main
    git checkout main 2>&1 | Tee-Object -Variable checkoutMainOutput

    # on reccupere les derniere modification dans le dossier distant
    git pull origine main 2>&1 | Tee-Object -Variable pullMainOutput

}catch
{
    # si j'ai une erreur on l'affiche ici
    Write-Host "Erreur sur: $_ "
}

# On boucle sur toute les branches
foreach ($branch in $branches)
{
    git checkout $branch 2>&1 | Tee-Object -Variable checkoutOutput
    if ($LASTEXITCODE -ne 0)
    {
        Write-Host "Erreur sur la branche $branch : $checkoutOutput"
        continue
    }
    git fetch origin 2>&1 | Tee-Object -Variable fetchOutput
    if ($LASTEXITCODE -ne 0)
    {
        Write-Host "Erreur sur la branche $branch : $fetchOutput"
        continue
    }

    git merge main 2>&1 | Tee-Object -Variable mergeOutput
    if ($LASTEXITCODE -ne 0)
    {
        Write-Host "Erreur sur la branche $branch : $mergeOutput"
        continue
    }

    git push origin $branch 2>&1 | Tee-Object -Variable pushOutput
    if ($LASTEXITCODE -ne 0)
    {
        Write-Host "Erreur sur la branche $branch : $pushOutput"
        continue
    }
}catch
{
    Write-Host "Erreur inatendue $branch : $_"
}
git checkout main 